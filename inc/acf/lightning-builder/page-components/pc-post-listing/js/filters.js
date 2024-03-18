document.addEventListener('click', (e) => {
    if (e.target.closest('.cat-filter')) {
        const catFilters = document.querySelectorAll('.cat-filter')
        catFilters.forEach((catFilter) => catFilter.classList.remove('active'))

        const catFilter = e.target.closest('.cat-filter')
        const filterValue = catFilter.dataset.value
        const postListing = catFilter.closest('.pc-post-listing')
        const postContainer = postListing.querySelector('.post-listing')
        const loadMoreBtn = postListing.querySelector('.load-more')
        if (loadMoreBtn) {
            loadMoreBtnText = loadMoreBtn.querySelector('.load-more-text')
            loadMoreBtn.dataset.catId = filterValue
        }

        const data = new FormData()
        data.append('action', 'load_more')
        data.append('security', liGlobal.loadMore)

        data.append('cat_id', filterValue)
        data.append('post_type', 'post')
        if (loadMoreBtn) {
            data.append('card_class', loadMoreBtn.dataset.cardClass)
            data.append('card_body', loadMoreBtn.dataset.cardBody)
        }

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
                catFilter.classList.add('active')
                if (loadMoreBtn) {
                    if (response.data.load_more_btn_text === 'Inga fler inlägg') {
                        loadMoreBtn.setAttribute('disabled', 'disabled')
                        loadMoreBtn.classList.remove('loading')
                    } else {
                        loadMoreBtn.removeAttribute('disabled')
                    }

                    loadMoreBtnText.textContent = response.data.load_more_btn_text
                }

                const posts = response.data.posts
                postContainer.innerHTML = ''
                posts.forEach((post) => {
                    postContainer.insertAdjacentHTML('beforeend', post)
                })
            })
    }
})
