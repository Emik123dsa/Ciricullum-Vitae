export default {
    state: ()=> ({
        apiBaseUrl: "/api/",
        allSkills: "",
        skillCards: "",
        aboutFeatures: ""
    }),
    getters: {
        skills: (s) => s.allSkills,
        skillCards: (s) => s.skillCards,
        aboutFeatures: (s) => s.aboutFeatures
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
        },
        setAboutFeatures(state, value) 
        {
            state.aboutFeatures = value;
        },
        clearAboutFeatures(state) {
            state.aboutFeatures = [];
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
                url: "skills",
            }
            );
            commit("setSkills", response);
        },
        async loadSkillCards({ dispatch, commit }) {
            const response = await dispatch("apiRequest", {
                url: "skill-cards"
            });

            commit("setSkillCards", response);
        },
        async loadAbout({ dispatch, commit }) {
            const response = await dispatch("apiRequest", {
                url: "about"
            })

            commit("setAboutFeatures", response);
        }
    }
}