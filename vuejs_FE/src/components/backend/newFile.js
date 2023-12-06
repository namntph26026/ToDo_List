import { defineComponent, ref, onMounted, onUnmounted } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";
import { useRoute } from "vue-router";

export default defineComponent({
setup() {
const router = useRouter();
const route = useRoute();
const list2Display = ref('none');
const isOpen1 = ref(false);
const searchQuery = ref('');
const searchResults = ref([]);
const searchResultsProject = ref([]);
const Navigation = ref('block');
const task_search = ref('none');
const project_search = ref('none');
const no_project = ref('none');
const no_task = ref('none');
const toggleMenu = () => {
this.$emit('toggle-menu');
};

const toggleList2 = () => {
list2Display.value = list2Display.value === 'block' ? 'none' : 'block';
};

const openModalkey = () => {
isOpen1.value = true;
};

const closeModalkey = () => {
isOpen1.value = false;
searchQuery.value = "";
Navigation.value = 'block';
searchResults.value = [];
searchResultsProject.value = [];
task_search.value = "none";
project_search.value = "none";
no_project.value = 'none';
no_task.value = 'none';
};
beforeRouteLeave(to, from, next); {
this.closeModalkey(); // Gọi hàm đóng modal ở đây
next();
};


const handleKeyDown = (event) => {
if (event.ctrlKey && event.key === "k") {
event.preventDefault();
openModalkey();
}
};

onMounted(() => {
window.addEventListener("keydown", handleKeyDown);
});

onUnmounted(() => {
window.removeEventListener("keydown", handleKeyDown);
});

const getSearch = () => {
if (searchQuery.value.length >= 3) {
Navigation.value = 'none';

} else {
Navigation.value = 'block';
task_search.value = "none";
project_search.value = "none";
no_project.value = 'none';
no_task.value = 'none';
// searchResultsProject.value=[];
};


const token = sessionStorage.getItem("token");
// alert(token);
if (searchQuery.value.length >= 3) {
axios
.get(`http://127.0.0.1:8000/api/search?query=${searchQuery.value}`, {
headers: {
Authorization: `Bearer ${token}`,
},
})
.then((response) => {
searchResults.value = response.data;
console.log(response.data);
task_search.value = "block";
if (searchResults.value.length === 0) {
// Không tìm thấy kết quả tìm kiếm
no_task.value = 'block';
} else {
no_task.value = 'none';
}
})
.catch(error => {
console.error(error);
});

axios
.get(`http://127.0.0.1:8000/api/searchProject?query=${searchQuery.value}`, {
headers: {
Authorization: `Bearer ${token}`,
},
})
.then((response) => {
searchResultsProject.value = response.data;
console.log(response.data);
project_search.value = "block";
if (searchResultsProject.value.length === 0) {
// Không tìm thấy kết quả tìm kiếm
no_project.value = 'block';
} else {
no_project.value = 'none';
}
})
.catch(error => {
console.error(error);
});
} else {
searchResults.value = [];
searchResultsProject.value = [];
}

};
return {
isOpen1,
openModalkey,
closeModalkey,
list2Display,
toggleMenu,
toggleList2,
getSearch,
searchQuery,
searchResults,
Navigation,
searchResultsProject,
task_search,
project_search,
no_project,
no_task
};
}
});
