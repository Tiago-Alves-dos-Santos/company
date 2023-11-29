import 'bootstrap';//scripts bootstrap
import './plugins';
import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
