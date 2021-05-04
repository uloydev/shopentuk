import { pageUrl } from "../helper-module";

if (pageUrl.indexOf('/store/product') > -1 || 
    pageUrl.indexOf('/store/toko-point') > -1 || 
    pageUrl.indexOf('/store/voucher') > -1
) {

    let urlQueriesAsArray = window.location.search.slice(1).split('&')
    let httpQueries = urlQueriesAsArray
                    .map(p => p.split('='))
                    .reduce((obj, [key, value]) => {
                        const encodingQuery = {...obj, [key]: value}
                        return encodingQuery
                    }, [])

    let currentUrl = window.location.href.split('?')[0]
    let newUrl;

    document.querySelector('#form-search').addEventListener('submit', () => {
        e.preventDefault();
        var searchInput = document.querySelector("#search-input").value;
        newUrl = currentUrl + "?search=" + searchInput;
        console.log(newUrl)
        for (const [key, value] of Object.entries(httpQueries)) {
            if (key != 'search') {
                newUrl += "&" + key + "=" + (value ?? '');
            }
        }
        window.location.href = newUrl;
    })

    const selectSortProduct = document.querySelector('#sort-product')
    selectSortProduct.addEventListener('change', () => {
        newUrl = currentUrl + "?sort=" + selectSortProduct.value
        for (const [key, value] of Object.entries(httpQueries)) {
            if (key != 'sort') {
                newUrl += "&" + key + "=" + (value ?? '');
            }
        }
        window.location.href = newUrl;
    })
}