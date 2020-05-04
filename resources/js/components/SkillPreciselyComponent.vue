<template>
  <div>
    <sui-item-group divided class="card-animation-wrapper" v-if="!loading">
      <sui-item>
        <h3
          is="sui-header"
          :class="{inverted: this.$cookie.get('__at-es') === 'true' ? true : false}"
        >
          <sui-icon :name="`${skills.name}`" :class="`${skills.color}`" size="big" />
          <sui-header-content
            :class="{inverted: this.$cookie.get('__at-es') === 'true' ? true : false}"
          >
            {{skills.title}}
            <sui-header-subheader
              :class="{inverted: this.$cookie.get('__at-es') === 'true' ? true : false}"
            >{{skills.desc}}</sui-header-subheader>
          </sui-header-content>
        </h3>
      </sui-item>
      <sui-item
        :style="{'border-top': this.$cookie.get('__at-es') === 'true' && '1px solid rgba(34,36,38,1)' }"
      >
        <h3
          is="sui-header"
          :class="{inverted: this.$cookie.get('__at-es') === 'true' ? true : false}"
        >
          <sui-icon name="linux" />
          <sui-header-content>
            About skill:
            <sui-header-subheader>Let me explain and widen it properly:</sui-header-subheader>
          </sui-header-content>
        </h3>
      </sui-item>
      <sui-item
        :style="{'border-top': this.$cookie.get('__at-es') === 'true' && '1px solid rgba(34,36,38,1)' }"
      >
        <sui-item-content>
          <sui-item-description :style="{color: this.$cookie.get('__at-es') === 'true' && '#fff'}">
            <p
              
              :style="{color: this.$cookie.get('__at-es') === 'true' ? true : false}"
              v-html="skills.about"
            ></p>
          </sui-item-description>
        </sui-item-content>
      </sui-item>
    </sui-item-group>
    <lazy-loading v-bind:loading="loading" v-if="loading" />
  </div>
</template>
 
<script>
import LazyLoading from "./LazyLoading.vue";
//import { mapGetters, mapActions } from "vuex";
export default {
  components: {
    LazyLoading
  },
  data() {
    return {
      skills: "",
      loading: true
    };
  },
  created() {
    this.getSkills();

  },
  methods: {
    async getSkills() {
      this.loading = true;

      const response = await this.$store.dispatch("loadSkills");

      var prompt = this.getDataRedirect(this.$store.getters.skills.data[0]);
      if (prompt === 0) {
        if (this.$router.path !== "/404") {
          this.$router.push("/404");
        }
      }

      this.loading = false;

      this.skills = !!this.$store.getters.skills.data[0][this.$route.params.id]
        ? this.$store.getters.skills.data[0][this.$route.params.id]
        : "";
    },
    getDataRedirect(array) {
      var quantity = 0;
      Object.keys(array).map(key => {
        switch (key) {
          case this.$route.params.id:
            ++quantity;
            break;
        }
      });
      return quantity;
    }
  },
  metaInfo: {
    title: "My Vue Cv Project"
  }
};
</script>

<style lang="scss" scoped>
.webpack {
  background: url("https://cdn.worldvectorlogo.com/logos/webpack.svg") no-repeat
    center center;
  background-size: contain;
}

</style>