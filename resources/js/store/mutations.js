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
    },
    FETCH_BILLS(state, bills) {
        return state.bills = bills
    }
}
export default mutations
