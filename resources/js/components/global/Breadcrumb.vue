<template>
  <div>
    <sui-breadcrumb v-if="breadcrumbs == 1">
      <sui-breadcrumb-section active>{{breadcrumbFilter[0].meta.breadcrumb}}</sui-breadcrumb-section>
    </sui-breadcrumb>
    <sui-breadcrumb v-else>
      <sui-breadcrumb-section 
      v-for="(breadcrumb, it) in breadcrumbBegin" 
      :key="it" 
      @click.native="switchToBack(breadcrumb.path)"
      link>
        {{breadcrumb.meta.breadcrumb}}
        <sui-breadcrumb-divider v-if="it < breadcrumbs - 1" />
      </sui-breadcrumb-section>

      <sui-breadcrumb-section
        v-for="breadcrumb in breadcrumbEnd"
        :key="breadcrumb.meta.breadcrumb"
        active
      >{{lcfirst($route.params.id)}}</sui-breadcrumb-section>
    </sui-breadcrumb>
  </div>
</template>

<script>
export default {
  data() {
    return {
      breadEnd: ""
    }
  },
  computed: {
    breadcrumbs() {
      return this.$breadcrumbs.length;
    },
    breadcrumbFilter() {
      return this.$breadcrumbs;
    },
    breadcrumbBegin() {
      return this.$breadcrumbs.filter((i) => {
        if (i.name == undefined) {
          return i.meta.breadcrumb;
        }
      });
    },
    breadcrumbEnd() {
      return this.$breadcrumbs.filter(i => {
        if (i.name != undefined) {
          return i.meta.breadcrumb;
        }
      });
    }
  },
  created() {
    this.breadEnd = this.lcfirst(this.$route.params.id);
  },
  methods: {
    returnBack(item) {
      if (this.$route.path !== item) {
        this.$router.push(item);
      }
    },
    lcfirst(str) {
      str += "";
      var f = str.charAt(0).toUpperCase();
      return f + str.substr(1);
    },
    switchToBack(item) {
      var delta = item.replace(":id", "", item);

      this.$router.push(delta);
    }
  },
  mounted() {
    
  }
};
</script>

<style>
</style>