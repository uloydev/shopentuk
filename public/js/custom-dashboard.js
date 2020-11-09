const pageUrl = window.location.pathname

const logoutBtn = document.querySelector('#logoutBtn');
logoutBtn.addEventListener('click', (e) => {
    e.preventDefault();
    document.getElementById('logout-form').submit();
});

// /admin/all-category page
if (pageUrl === '/admin/all-category') {
    const manageCategoryPage = document.querySelector('#manageCategoryPage')
    const editSubCategoryBtn = manageCategoryPage.querySelectorAll(".edit-sub-category-btn")
    const subCategoryFocused = ['border', 'border-primary', 'p-2']

    editSubCategoryBtn.forEach(btnEditSub => {
        const subcategoryTitle = btnEditSub.parentElement.querySelector('.subcategory__title')

        btnEditSub.addEventListener('click', () => {
            subcategoryTitle.classList.add(...subCategoryFocused)
            subcategoryTitle.setAttribute('contenteditable', true)
            subcategoryTitle.focus()
        });

        subcategoryTitle.addEventListener('focusout', () => {
            subcategoryTitle.setAttribute('contenteditable', false)
            subcategoryTitle.classList.remove(...subCategoryFocused)

            //ksh ajax disini ntar buat save perubahan di subcategory nya
        });
    })
}

if (pageUrl == '/admin/products') {

    // const tbody = document.querySelector('#tbody')
    // const allProductUrl = 'http://localhost:8000/api/admin/products'
    
    // const containerPagination = document.querySelector('.pagination')
    // const prevBtnPagination = containerPagination.querySelector('.page-prev')

    // function createNode(element) {
    //     return document.createElement(element); // Create the type of element you pass in the parameters
    // }
      
    // function append(parent, el) {
    //     return parent.appendChild(el); // Append the second parameter(element) to the first one
    // }

    // function appendAfter(referenceNode, newNode) {
    //     referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
    // }

    // fetch(allProductUrl).then(res => res.json())
    // .then(products => {
    //     let allProductData = Array.from(products.data.data);
    //     let totalData = products.data.total
    //     let perPage = products.data.per_page
    //     let totalPage = Math.ceil(totalData / perPage)

    //     return allProductData.map(product => {

    //         let paginationNumber = createNode('li');
    //         paginationNumber.classList.add('page-item', 'pagination-number');

    //         let paginationLink = createNode('a');
    //         paginationLink.classList.add('page-link');
    //         paginationLink.setAttribute('href', 'javascript:void(0)')
            
    //         let tr = createNode('tr');
    //         tr.classList.add('product-item');

    //         let productTitleEl = createNode('td');
    //         productTitleEl.classList.add('product-item__title');

    //         let productPriceEl = createNode('td');
    //         productPriceEl.classList.add('product-item__price');

    //         let productPointEl = createNode('td');
    //         productPointEl.classList.add('product-item__point');

    //         let productCatEl = createNode('td');
    //         productCatEl.classList.add('product-item__cat');

    //         let productSubCatEl = createNode('td');
    //         productSubCatEl.classList.add('product-item__sub-cat');

    //         productTitleEl.innerHTML = product.title;
    //         productPriceEl.innerHTML = product.price;
    //         productPointEl.innerHTML = product.point_price;
    //         productCatEl.innerHTML = product.category_id;
    //         productSubCatEl.innerHTML = product.sub_category_id;

    //         append(tr, productTitleEl);
    //         append(tr, productPriceEl);
    //         append(tr, productPointEl);
    //         append(tr, productCatEl);
    //         append(tr, productSubCatEl);
    //         append(tbody, tr);
            
    //         append(paginationNumber, paginationLink)
    //         appendAfter(prevBtnPagination, paginationNumber)
    //         // append(containerPagination, paginationNumber)

    //     })

        
    // })
    // .catch(error => console.log(error));
    
    const manageProductPage = document.querySelector('#manageProductPage')
    const columnFocusedClass = ['border', 'border-primary', 'p-2']

    function findMultiElOnManageProductPage(element) {
        return manageProductPage.querySelectorAll(element)
    }

    const productTitle = findMultiElOnManageProductPage('.product-item__title')
    const productPrice = findMultiElOnManageProductPage('.product-item__price')
    const productPoint = findMultiElOnManageProductPage('.product-item__point')
    const productCat = findMultiElOnManageProductPage('.product-item__cat')
    const productSubCat = findMultiElOnManageProductPage('.product-item__sub-cat')
    let originalValue, changedValue

    productTitle.forEach((element, index) => {
        const eachTitle = productTitle[index]
        const eachPrice = productPrice[index]
        const eachPoint = productPoint[index]
        const eachCat = productCat[index]
        const eachSubCat = productSubCat[index]

        const allElement = [eachTitle, eachPrice, eachPoint, eachCat, eachSubCat]
        allElement.forEach(element => {

            let formattedValue = element.textContent.trim()

            element.addEventListener('click', () => {
                originalValue = element.dataset.original.trim()
                element.classList.add(...columnFocusedClass)
                element.setAttribute('contenteditable', true)
                element.textContent = originalValue
                element.focus()
            });

            element.addEventListener('input', (e) => {
                //jika yg lg diedit adalah kolom price, hapus karakter yg bkn integer
                if (element === eachPrice) {
                    changedValue = element.textContent.replace(/\D/g, '')
                    element.dataset.original = changedValue
                    element.textContent = changedValue
                } else {
                    changedValue = element.textContent
                }
                element.setAttribute('data-original', changedValue)
                formattedValue = changedValue
            });

            element.addEventListener('focusout', () => {
                element.setAttribute('contenteditable', false)
                element.classList.remove(...columnFocusedClass)

                if (originalValue === element.textContent) {
                    //jika yg lg diedit adalah kolom price, hapus karakter yg bkn integer
                    if (element === eachPrice) {
                        element.textContent = new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR'
                        }).format(originalValue).replace(',00', '')
                    } else {
                        element.textContent = formattedValue
                    }
                } else {
                    element.dataset.original = changedValue

                    //jika yg lg diedit adalah kolom price, hapus karakter yg bkn integer
                    if (element === eachPrice) {
                        element.textContent = new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR'
                        }).format(changedValue).replace(',00', '')
                    } else {
                        formattedValue = changedValue.substring(0, 10) + '...'
                        element.textContent = formattedValue
                        element.dataset.original = changedValue
                    }
                }

            });
        });
    });


}

if (pageUrl === '/superadmin/admins') {
    const manageAdminPage = document.querySelector("#manageAdminPage")
    const totalError = manageAdminPage.querySelectorAll('.invalid-feedback').length
    if (totalError > 0) { //if there's an error when add/update admin acc
        $("#addNewAdmin").modal('show');
    }
}