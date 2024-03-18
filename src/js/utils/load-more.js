let paged = 1
export const loadPosts = async (e) => {
    let postContainer,
        loadMoreBtn = e.target,
        loadMoreBtnText = loadMoreBtn.querySelector('.load-more-text'),
        excludePosts = [...document.querySelectorAll('[data-post-id]')].map((exP) => exP.dataset.postId)

    const data = new FormData()
    const articleListing = loadMoreBtn.closest('.container')
    postContainer = articleListing.querySelector('.post-listing')
    if (loadMoreBtn.dataset.catId) {
        data.append('cat_id', loadMoreBtn.dataset.catId)
    }

    if (loadMoreBtn.dataset.searchQuery) {
        data.append('search_query', loadMoreBtn.dataset.searchQuery)
    }

    loadMoreBtn.classList.add('loading')
    paged++

    if (excludePosts.length > 0) {
        data.append('exclude', excludePosts)
    }

    if (loadMoreBtn.dataset.postType) {
        data.append('post_type', loadMoreBtn.dataset.postType)
    }

    data.append('card_class', loadMoreBtn.dataset.cardClass)
    data.append('card_body', loadMoreBtn.dataset.cardBody)

    data.append('action', 'load_more')
    data.append('security', liGlobal.loadMore)
    data.append('paged', paged || 1)

    fetch(liGlobal.ajaxUrl, {
        method: 'POST',
        body: data,
    })
        .then((response) => response.text())
        .then((response) => {
            response = JSON.parse(response)
            if (!response.success) {
                return
            }
            if (response.data.load_more_btn_text === 'Inga fler inlägg') {
                loadMoreBtn.setAttribute('disabled', 'disabled')
                loadMoreBtn.classList.remove('loading')
            } else {
                loadMoreBtn.removeAttribute('disabled')
            }

            loadMoreBtnText.textContent = response.data.load_more_btn_text

            loadMoreBtn.classList.remove('loading')

            const posts = response.data.posts

            posts.forEach((post) => {
                postContainer.insertAdjacentHTML('beforeend', post)
            })

            // postCount.textContent = response.data.found_posts
        })
        .catch((error) => {
            console.error('error ' + error)
        })
}

document.addEventListener('click', function (e) {
    if (e.target.classList.contains('load-more')) {
        e.preventDefault()
        loadPosts(e)
    }
})
