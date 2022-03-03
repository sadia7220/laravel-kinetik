let actions = {
    createCustomer({commit}, customer) {
        console.log(101)
        axios.post('/api/customer/create', customer, {
            headers: {
              'Authorization': `Bearer 1|P3FV4xgmm5RIfPWNAkvVhLzEy9LF4CyBeL27OziD`
            }
          })
            .then(res => {
                commit('CREATE_CUSTOMER', res.data)
                window.location.href = '/customers';
            }).catch(err => {
            console.log(err)
        })
    },
    fetchCustomers({commit}) {
        axios.get('/api/customers', {
            headers: {
              'Authorization': `Bearer 1|P3FV4xgmm5RIfPWNAkvVhLzEy9LF4CyBeL27OziD`
            }
          })
            .then(res => {
                commit('FETCH_CUSTOMERS', res.data.data)
            }).catch(err => {
            console.log(err)
        })
    },
    deleteCustomer({commit}, customer) {
        axios.delete(`/api/customers/${customer.id}`)
            .then(res => {
                if (res.data === 'ok')
                    commit('DELETE_CUSTOMER', customer)
            }).catch(err => {
            console.log(err)
        })
    }
}
export default actions