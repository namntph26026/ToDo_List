<template>
  <div  style="position: relative">
    <TheHeader @toggle-menu="toggleMenu"/>
    <div class="" style="display: flex; position: relative">
      <TheMenu  :expanded="menuExpanded" />
      <router-view :expanded="contentExpanded"  ></router-view>
    </div>
  </div>
</template>

<script>
import { ref } from 'vue';
import TheHeader from "../components/backend/TheHeader.vue";
import TheMenu from "../components/backend/TheMenu.vue";

export default {
  components: {
    TheHeader,
    TheMenu,
  },
  setup() {
    const menuExpanded = ref(false);
    const contentExpanded = ref(false);

    const toggleMenu = () => {
      menuExpanded.value = !menuExpanded.value;
      contentExpanded.value = !contentExpanded.value;
    };

    return {
      menuExpanded,
      contentExpanded,
      toggleMenu,
    };
  },
};
</script>
