export default {
    state: {
        allSkills: "",
        skill: "php",
        apiBaseUrl: "http://www.mocky.io/v2/"
    },
    getters: {
        skills: (s) => s.allSkills,
        currentSkill: (s) => s.skill
    },
    mutations: {
        setSkills(state, context) {
            state.allSkills = context;
        },
        clearSkills(state) {
            state.allSkills = "";
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
                    "X-CSRF-Token": "random_token", 
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
    async clearSkills({ commit }) {
        commit("clearSkills");
    }
}
}