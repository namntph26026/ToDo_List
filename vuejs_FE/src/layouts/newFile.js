export default (await import('vue')).defineComponent({
components: {
TheHeader,
TheMenu,
},
data() {
return {
menuExpanded: false,
contentExpanded: false
};
},
methods: {
toggleMenu() {
this.menuExpanded = !this.menuExpanded;
this.contentExpanded = !this.contentExpanded;
}
}
});
