<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoList</title>
    <script src="https://cdn.tailwindcss.com"> </script>
</head>


<body class="bg-[url('../img/DSC_1761-2000x1200.jpg')]">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8" id="register">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-40 w-auto" src="./Medias/luffy.png" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Create your account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <div>
                <label for="firstName" class="block text-sm font-medium leading-6 text-gray-900">First Name</label>
                <div class="mt-2">
                    <input id="firstNameRegister" name="firstNameRegister" type="text" autocomplete="firstName" value="killian" required class="indent-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <label for="lastName" class="block text-sm font-medium leading-6 text-gray-900">Last Name</label>
                <div class="mt-2">
                    <input id="lastNameRegister" name="lastNameRegister" type="text" autocomplete="lastName" value="vanhove" required class=" indent-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                <div class="mt-2">
                    <input id="emailRegister" name="emailRegister" type="email" autocomplete="email" value="killian2908@gmail.com" required class=" indent-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                </div>
                <div class="mt-2">
                    <input id="passwordRegister" name="passwordRegister" type="password" autocomplete="current-password" value="123" required class="indent-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>

            </div>
            <div class="flex items-center justify-between">
                <label for="confirmPassword" class="block text-sm font-medium leading-6 text-gray-900">Confirm Password</label>
            </div>
            <div class="mt-2">
                <input id="password" name="confirmPassword" type="password" autocomplete="current-password" value="123" required class="indent-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            <p class="flex w-1/2 justify-center rounded-md  px-3 py-1.5 text-sm font-semibold leading-6 hover: cursor-pointer" onclick="showLogin()">Already registered ? </p>

            <div>
                <button onclick="handleRegister()" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
            </div>
        </div>
    </div>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 hidden" id="login">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-40 w-auto" src="./Medias/luffy.png" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                <div class="mt-2">
                    <input id="emailLogin" name="email" type="email" autocomplete="email" required class="indent-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    <div class="text-sm">
                        <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                    </div>
                </div>

                <div class="mt-2">
                    <input id="passwordLogin" name="password" type="password" autocomplete="current-password" required class="indent-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <p class="flex w-1/2 justify-center rounded-md  px-3 py-1.5 text-sm font-semibold leading-6 hover: cursor-pointer" onclick="showRegister()">Don't have an account ? </p>
            <div>
                <button type="button" onclick="handleLogin()" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
            </div>

        </div>
    </div>


    <div id="todolist" class="relative hidden flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div>
            <button type="button" onclick="handleLout()" class="top-1 right-10 absolute flex w-50 justify-center rounded-md bg-red-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Log out</button>
        </div>
        <div>
            <button type="button" onclick="showUpdateAccount()" class="top-14 right-10 absolute flex w-50 justify-center rounded-md bg-green-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Update Account</button>
        </div>
        <img class="mx-auto h-40 w-auto" src="./img/luffysenfou.jpg" alt="Your Company">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">To Do List (genre les truc a faire quoi)</h2>
        <div class="bg-white shadow overflow-hidden sm:rounded-md max-w-sm mx-auto mt-16">

            <p>Task name</p>
            <input type="text" placeholder="Task Name" name="taskName" id="taskName" class="w-40 indent-3">
            <p>Task description</p>
            <input type="text" placeholder="Task description" name="taskDescription" id="taskDescription" class="w-40 indent-3">
            <p>Priority</p>
            <select name="priority" id="taskPriority">
                <option value="1">Normal</option>
                <option value="2">Important</option>
                <option value="3">Urgent</option>
            </select>
            <p>Category</p>
            <select name="category" id="taskCategory">
                <option value="1">Personnal</option>
                <option value="2">Work</option>
                <option value="3">Family</option>
                <option value="4">Friends</option>
            </select>
            <input type="date" name="date" id="dueDate">
            <button onclick="addTask()" class="font-medium text-indigo-500 hover:text-indigo-800">Add task</button>
        </div>

        <div id="taskContainer">
        </div>
    </div>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 hidden" id="updateAccount">
        <div>
            <button type="button" onclick="showUpdateAccount()" class="top-14 right-10 absolute flex w-50 justify-center rounded-md bg-green-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Update Account</button>
        </div>
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-40 w-auto" src="./img/luffy3.png" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Update your account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <div>
                <label for="firstName" class="block text-sm font-medium leading-6 text-gray-900">First Name</label>
                <div class="mt-2">
                    <input id="firstNameUpdate" name="firstNameUpdate" type="text" autocomplete="firstName" value="killian" required class="indent-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <label for="lastName" class="block text-sm font-medium leading-6 text-gray-900">Last Name</label>
                <div class="mt-2">
                    <input id="lastNameUpdate" name="lastNameUpdate" type="text" autocomplete="lastName" value="vanhove" required class=" indent-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                <div class="mt-2">
                    <input id="emailUpdate" name="emailUpdate" type="email" autocomplete="email" value="killian2908@gmail.com" required class=" indent-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                </div>
                <div class="mt-2">
                    <input id="passwordUpdate" name="passwordUpdate" type="password" autocomplete="current-password" value="123" required class="indent-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>

            </div>
            <div class="flex items-center justify-between">
                <label for="confirmPassword" class="block text-sm font-medium leading-6 text-gray-900">Confirm Password</label>
            </div>
            <div class="mt-2">
                <input id="password" name="confirmPassword" type="password" autocomplete="current-password" value="123" required class="indent-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>

            <div>
                <button onclick="handleUpdateAccount()" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update Account</button>
            </div>
        </div>
    </div>

    <script src="./Js/script.js"></script>
</body>

</html>