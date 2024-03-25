let register = document.querySelector("#register");
let login = document.querySelector("#login");
let todolist = document.querySelector("#todolist");
let updateAccount = document.querySelector("#updateAccount");
let userId = null;
function showLogin() {
  register.classList.add("hidden");
  login.classList.remove("hidden");
}

function showRegister() {
  register.classList.remove("hidden");
  login.classList.add("hidden");
}

//* LOGIN
function handleLogin() {
  //! Login section

  console.log("handleLogin clicked");
  // Get the password and email of the user
  let email = document.querySelector("#emailLogin").value;
  let password = document.querySelector("#passwordLogin").value;
  let emailCredentials = {
    email: email,
    password: password,
  };
  // Define parameters to use
  let params = {
    method: "POST",
    headers: {
      "Content-Type": "application/json; charset=utf-8",
    },
    body: JSON.stringify(emailCredentials),
  };

  // send value to login.php
  fetch("../login.php", params)
    .then((res) => res.json())
    .then((data) => {
      console.log(data.status);
      if (data.status === "success") {
        register.classList.add("hidden");
        login.classList.add("hidden");
        todolist.classList.remove("hidden");
        console.log(data.message);
        userId = data.userId; // Get the user ID from the SQL request in login to use is globally for the session
        // Fetch all the tasks to display them
        //! Retrieve task section
        fetch("../retrieveTasks.php")
          .then((response) => response.json())
          .then((tasks) => {
            const taskContainer = document.querySelector("#taskContainer");
            taskContainer.innerHTML = ""; // Clear the container
            console.log(tasks);
            tasks.forEach((task) => {
              // Create a new element for each task
              const taskElement = document.createElement("div");
              console.log(task.ID_TASK);
              taskElement.innerHTML = `
              <ul class="bg-white shadow overflow-hidden sm:rounded-md max-w-sm mx-auto mt-16" id="${task.ID_TASK}">
                <li>
                    <div class="px-4 py-5 sm:px-6">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">${task.NAME}</h3>
                             <p class="mt-1 max-w-2xl text-sm text-black-500">Due date : ${task.DUE_DATE} </p>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">${task.DESCRIPTION} </p>
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <p class="text-sm font-medium text-gray-500">Priority : <span class="text-green-600">${task.PRIORITY_NAME} </span></p>
                            <p class="text-sm font-medium text-gray-500">Category : <span class="text-green-600">${task.CATEGORY_NAME} </span></p>
                            <div class="d-flex">
                                <button onclick="deleteTask(${task.ID_TASK})" class="font-medium text-red-500 hover:text-red-800" >Delete</button>
                                <button onclick="editTask()" class="font-medium text-yellow-500 hover:text-yellow-800">Edit</button>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>`;

              // Add the task element to the container
              taskContainer.appendChild(taskElement);
            });
          })
          .catch((error) => console.error("Error fetching tasks:", error));
      } else {
        console.log("Incorrect login");
      }
    })
    .catch((error) => console.error("Error:", error));
}

//* REGISTER

function handleRegister() {
  let emailRegister = document.querySelector("#emailRegister").value;
  let firstNameRegister = document.querySelector("#firstNameRegister").value;
  let lastNameRegister = document.querySelector("#lastNameRegister").value;
  let passwordRegister = document.querySelector("#passwordRegister").value;

  let registerCredentials = {
    email: emailRegister,
    firstName: firstNameRegister,
    lastName: lastNameRegister,
    password: passwordRegister,
  };

  let params = {
    method: "POST",
    headers: {
      "Content-Type": "application/json; charset=utf-8",
    },
    body: JSON.stringify(registerCredentials),
  };

  fetch("../register.php", params)
    .then((res) => res.json())
    .then((data) => {
      if (data.status === "success") {
        console.log(data.message);
      } else {
        console.log("Un utilisateur utilise deja ce mail");
      }
    })
    .catch((error) => console.error("Error:", error));
}

//* addTask

function addTask() {
  // Get the password and email of the user
  let taskName = document.querySelector("#taskName").value;
  let taskDescription = document.querySelector("#taskDescription").value;
  let taskPriority = document.querySelector("#taskPriority").value;
  let taskCategory = document.querySelector("#taskCategory").value;
  let dueDate = document.querySelector("#dueDate").value;

  let taskCredentials = {
    taskName: taskName,
    taskDescription: taskDescription,
    taskPriority: taskPriority,
    taskCategory: taskCategory,
    dueDate: dueDate,
    userId: userId,
  };

  // Define parameters to use
  let params = {
    method: "POST",
    headers: {
      "Content-Type": "application/json; charset=utf-8",
    },
    body: JSON.stringify(taskCredentials),
  };

  // send value to login.php
  fetch("../addTask.php", params)
    .then((res) => res.json())
    .then((data) => {
      console.log(data.status);
      if (data.status === "success") {
        fetch("../retrieveTaskNow.php")
          .then((response) => response.json())
          .then((task) => {
            const taskContainer = document.querySelector("#taskContainer");
            taskContainer.innerHTML = "";
            const lastTask = task[task.length - 1];
            if (lastTask) {
              const taskElement = document.createElement("div");
              console.log(lastTask.ID_TASK);
              taskElement.innerHTML = `
              <ul class="bg-white shadow overflow-hidden sm:rounded-md max-w-sm mx-auto mt-16" id="${lastTask.ID_TASK}">
                <li>
                    <div class="px-4 py-5 sm:px-6">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">${lastTask.NAME}</h3>
                             <p class="mt-1 max-w-2xl text-sm text-black-500">Due date : ${lastTask.DUE_DATE} </p>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">${lastTask.DESCRIPTION} </p>
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <p class="text-sm font-medium text-gray-500">Priority : <span class="text-green-600">${lastTask.PRIORITY_NAME} </span></p>
                            <p class="text-sm font-medium text-gray-500">Category : <span class="text-green-600">${lastTask.CATEGORY_NAME} </span></p>
                            <div class="d-flex">
                                <button onclick="deleteTask(${lastTask.ID_TASK})" class="font-medium text-red-500 hover:text-red-800" >Delete</button>
                                <button onclick="editTask()" class="font-medium text-yellow-500 hover:text-yellow-800">Edit</button>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>`;
              taskContainer.appendChild(taskElement);
            }
          })
          .catch((error) => console.error("Error fetching tasks:", error));
      } else if (data.status === "error") {
        console.log(data.message);
      }
    })
    .catch((error) => console.error("Error adding task:", error));
}

function deleteTask(Id) {
  let sectionToDelete = document.getElementById(Id);
  sectionToDelete.remove();

  let deleteCredentials = {
    taskId: Id,
  };
  let params = {
    method: "POST",
    headers: {
      "Content-Type": "application/json; charset=utf-8",
    },
    body: JSON.stringify(deleteCredentials),
  };
  // send value to login.php
  fetch("../removeTask.php", params)
    .then((res) => res.json())
    .then((data) => {
      console.log(data);
      if (data.status === "success") {
        console.log(data.message);
      } else if (data.status === "error") {
        console.log(data.message);
      }
    })
    .catch((error) => console.error("Error:", error));
}

//* show Update Account
let accountShown = true;
function showUpdateAccount(params) {
  if (accountShown) {
    accountShown = false;
    todolist.classList.add("hidden");
    updateAccount.classList.remove("hidden");
  } else {
    accountShown = true;
    todolist.classList.remove("hidden");
    updateAccount.classList.add("hidden");
  }
}



//* Update Account

function handleUpdateAccount() {
  let emailUpdate = document.querySelector("#emailUpdate").value;
  let firstNameUpdate = document.querySelector("#firstNameUpdate").value;
  let lastNameUpdate = document.querySelector("#lastNameUpdate").value;
  let passwordUpdate = document.querySelector("#passwordUpdate").value;

  let UpdateCredentials = {
    email: emailUpdate,
    firstName: firstNameUpdate,
    lastName: lastNameUpdate,
    password: passwordUpdate,
  };

  let params = {
    method: "POST",
    headers: {
      "Content-Type": "application/json; charset=utf-8",
    },
    body: JSON.stringify(UpdateCredentials),
  };

  fetch("../updateAccount.php", params)
    .then((res) => res.json())
    .then((data) => {
      if (data.status === "success") {
        console.log(data.message);
      } else {
        console.log("Un utilisateur utilise deja ce mail");
      }
    })
    .catch((error) => console.error("Error:", error));
}