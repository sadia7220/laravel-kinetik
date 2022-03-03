let token = localStorage.getItem('access_token');

console.log(token)
let actions = {
    createCustomer({commit}, customer) {
        axios.post('http://127.0.0.1:8000/api/customer/create', customer, {
            headers: {
              'Authorization': `Bearer ${token}`
            }
          })
            .then(res => {
                console.log(res)
                commit('CREATE_CUSTOMER', res.data)
                window.location.href = '/customers';
            }).catch(err => {
            console.log(err)
        })
    },
    fetchCustomers({commit}) {
        axios.get('http://127.0.0.1:8000/api/customers', {
            headers: {
              'Authorization': `Bearer 11`
            }
          })
            .then(res => {
                commit('FETCH_CUSTOMERS', res.data.data)
            }).catch(err => {
            console.log(err)
        })
    },
    fetchBills({commit}, bill) {
        axios.delete(`/api/bill/billByCustomer/${bill.id}`)
            .then(res => {
                    commit('FETCH_BILLS', bill)
            }).catch(err => {
            console.log(err)
        })
    }
}
export default actions