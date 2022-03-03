import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        title: "",
        body: "",
        photoObj: "",
        photo: ""
    },
    mutations: {
        setTitle(state, value) {
            state.title = value;
        },
        setBody(state, value) {
            state.body = value
        },
        setPhotoObj(state, value) {
            state.photoObj = value
        },
        setPhoto(state, value) {
            state.photo = value
        }
    }
});