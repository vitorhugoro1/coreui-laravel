const mutations = {
    changeType(state, payload) {
        state.type = payload;
    },
    changeGender(state, payload) {
        state.gender = payload;
    }
};

export default mutations;