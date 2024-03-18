let youtubePlayers = {}
let youtubeApiReady = false
let vimeoPlayers = {}
function initPlayers() {
    document.querySelectorAll('.video-player-wrapper').forEach(function (wrapper, index) {
        let player = wrapper.querySelector('.video-player')
        let videoId = wrapper.getAttribute('data-video-id')
        let videoType = wrapper.getAttribute('data-video-type')
        let controls = wrapper.getAttribute('data-video-controls')
        let autoplay = wrapper.getAttribute('data-video-autoplay')

        if (!player.id) {
            player.id = 'player-id-' + index
        }

        if (videoType === 'youtube') {
            // YouTube Player initialisering
            createYouTubePlayer(player.id, videoId, controls, autoplay)
        } else if (videoType === 'vimeo') {
            // Vimeo Player initialisering
            vimeoPlayers[player.id] = new Vimeo.Player(player, {
                id: videoId,
                autoplay: autoplay === '1',
                controls: controls === '1',
                muted: autoplay === '1',
            })
        } else if (videoType === 'html5') {
            // HTML5 video initialisering
            if (autoplay === '1') {
                video = player.querySelector('video')
                video.muted = true

                video.play()
            }
        }
    })

    checkViewport()
}

function createYouTubePlayer(playerElementId, videoId, controls, autoplay) {
    youtubePlayers[playerElementId] = new YT.Player(playerElementId, {
        videoId: videoId,
        playerVars: {
            autoplay: parseInt(autoplay, 10),
            controls: parseInt(controls, 10),
            mute: parseInt(autoplay, 10),
            loop: parseInt(autoplay, 10),
            playlist: videoId,
            modestbranding: 1,
            playsinline: 1,
            fs: 0,
            cc_load_policy: 0,
            iv_load_policy: 3,
            autohide: parseInt(autoplay, 10),
            events: {
                onReady: function (event) {
                    // Spelaren är nu redo. Du kan även sätta en flagga här om du vill.
                    youtubeApiReady = true
                },
            },
        },
    })
}

function isInViewport(elem) {
    let bounding = elem.getBoundingClientRect()
    return (
        bounding.top >= -100 &&
        bounding.left >= 0 &&
        bounding.bottom <= (window.innerHeight + 100 || document.documentElement.clientHeight + 100) &&
        bounding.right <= (window.innerWidth || document.documentElement.clientWidth)
    )
}

function checkViewport() {
    document.querySelectorAll('.video-player-wrapper').forEach((wrapper) => {
        if (wrapper.classList.contains('video-activated')) return

        let player = wrapper.querySelector('.video-player')
        let video = wrapper.querySelector('video') // Hämta HTML5-videoelementet om det finns
        let videoType = wrapper.getAttribute('data-video-type')
        let autoplay = wrapper.getAttribute('data-video-autoplay')

        if (autoplay === '1' && isInViewport(wrapper)) {
            if (
                videoType === 'youtube' &&
                youtubePlayers[player.id] &&
                typeof youtubePlayers[player.id].getPlayerState === 'function'
            ) {
                youtubePlayers[player.id].playVideo()
            } else if (videoType === 'vimeo' && vimeoPlayers[player.id]) {
                vimeoPlayers[player.id].play()
            } else if (videoType === 'html5' && video) {
                video.play()
            }
        } else {
            if (
                videoType === 'youtube' &&
                youtubePlayers[player.id] &&
                typeof youtubePlayers[player.id].getPlayerState === 'function'
            ) {
                youtubePlayers[player.id].pauseVideo()
            } else if (videoType === 'vimeo' && vimeoPlayers[player.id]) {
                vimeoPlayers[player.id].pause()
            } else if (videoType === 'html5' && video) {
                video.pause()
            }
        }
    })
}

let youtubeApiLoaded = new Promise((resolve, reject) => {
    if (document.querySelectorAll('.video-player-wrapper[data-video-type="youtube"]').length > 0) {
        var tag = document.createElement('script')
        tag.src = 'https://www.youtube.com/iframe_api'
        var firstScriptTag = document.getElementsByTagName('script')[0]
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag)

        window.onYouTubeIframeAPIReady = () => resolve()
    } else {
        resolve() // Inga YouTube-videor, lös direkt
    }
})

let vimeoApiLoaded = new Promise((resolve, reject) => {
    if (document.querySelectorAll('.video-player-wrapper[data-video-type="vimeo"]').length > 0) {
        var tag = document.createElement('script')
        tag.src = 'https://player.vimeo.com/api/player.js'
        var firstScriptTag = document.getElementsByTagName('script')[0]
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag)

        tag.onload = () => resolve()
    } else {
        resolve() // Inga Vimeo-videor, lös direkt
    }
})

Promise.all([youtubeApiLoaded, vimeoApiLoaded]).then(() => {
    initPlayers()
    window.addEventListener('scroll', checkViewport)
})

document.addEventListener('click', function (e) {
    if (e.target.closest('.play-video')) {
        let playButton = e.target.closest('.play-video')
        let videoWrapper = playButton.closest('.video-player-wrapper')
        let player = videoWrapper.querySelector('.video-player')
        let videoType = videoWrapper.getAttribute('data-video-type')

        if (videoType === 'youtube') {
            let playerElementId = player.id
            if (youtubePlayers[playerElementId] && typeof youtubePlayers[playerElementId].playVideo === 'function') {
                youtubePlayers[playerElementId].seekTo(0)
                youtubePlayers[playerElementId].unMute()
                youtubePlayers[playerElementId].playVideo()
            }
        } else if (videoType === 'vimeo') {
            let playerElementId = player.id
            if (vimeoPlayers[playerElementId]) {
                vimeoPlayers[playerElementId].setVolume(1)
                vimeoPlayers[playerElementId].setCurrentTime(0)
                vimeoPlayers[playerElementId].play()
            }
        } else if (videoType === 'html5') {
            let video = player.querySelector('video')
            if (video) {
                video.muted = false
                video.loop = false
                video.volume = 1
                video.currentTime = 0
                video.play()
            }
        }

        videoWrapper.classList.add('video-activated')
        playButton.classList.add('hidden')
    }
})
