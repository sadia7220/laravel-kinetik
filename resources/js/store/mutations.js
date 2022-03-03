let mutations = {
    CREATE_CUSTOMER(state, customer) {
        state.customers.unshift(customer)
    },
    FETCH_CUSTOMERS(state, customers) {
        return state.customers = customers
    },
    DELETE_CUSTOMER(state, customer) {
        let index = state.customers.findIndex(item => item.id === customer.id)
        state.customers.splice(index, 1)
    }
}
export default mutations
