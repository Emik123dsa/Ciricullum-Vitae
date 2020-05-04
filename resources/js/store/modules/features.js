export default {
    state: {
        allSkills: "",
        apiBaseUrl: "http://www.mocky.io/v2/",
        skillCards: ""
    },
    getters: {
        skills: (s) => s.allSkills,
        skillCards: (s) => s.skillCards
    },
    mutations: {
        setSkills(state, context) {
            state.allSkills = context;
        },
        clearSkills(state) {
            state.allSkills = "";
        },
        setSkillCards(state, context) {
            state.skillCards = context;
        },
        clearSkillCards(state) {
            state.skillCards = [];
        }
    },
    actions: {
        async apiRequest({ state }, { method, url, baseURL, params = {}, data }) {
            let config = {
                method: method || "get",
                baseURL: baseURL || state.apiBaseUrl,
                url: url,
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                    "Cache-Control": "no-cache",
                },
                params: {
                    ...params
                }
            };

            return new Promise((res, rej) => {
                axios(config)
                    .then((response) => res(response))
                    .catch((error) => rej(error))
            });
    },
    async loadSkills({ dispatch, commit }) {

        const response = await dispatch("apiRequest", {
            url: "5eadd6982f00004b00198895",
            params: {
                "mocky-delay": "300ms"
            }
        }
        );
        commit("setSkills", response);
    },
    async loadSkillCards({dispatch, commit}) {
        const response = await dispatch("apiRequest", {
            baseURL: "/api", 
            url: "/skill-cards"
        });

        commit("setSkillCards", response);
    }
}
}