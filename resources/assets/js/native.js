import 'boxicons'
import './helper-utilities.js'
import './component/nav'
import './page/homepage'
import './page/auth'
import './page/cart-page'
import './page/dashboard-customer'

//plugin js
if (document.querySelector('[data-tabs]')) {
    new Tabby('[data-tabs]')
}
//general js
