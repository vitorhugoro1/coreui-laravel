const mutations = {
    changeType(state, payload) {
        state.type = payload;
    },
    changeGender(state, payload) {
        state.gender = payload;
    },
    changeAgeing(state, payload) {
        state.age_bracket = payload;
    }
};

export default mutations;