<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">

        <!-- You can open the modal using ID.showModal() method -->
        <button class="btn" onclick="my_modal_4.showModal()">Add User</button>
        <dialog id="my_modal_4" class="modal">
          <div class="modal-box w-11/12 max-w-5xl">
            <form action="{{ route('users.store') }}" class="flex flex-col" method="POST">
              @csrf
              <label>name</label>
              <input name="name" value="name">
              <label>email</label>
              <input name="email" :value="name">
              <label>password</label>
              <input name="password" value="password" type="password">
              <label>role</label>
              <select name="role" id="">
                <option value="admin">Admint</option>
                <option value="petugas">Petugas</option>
              </select>
              <button type="submit">kirim</button>
            </form>
            <div class="modal-action">
              <form method="dialog">
                <!-- if there is a button, it will close the modal -->
                <button class="btn">Close</button>
              </form>
            </div>
          </div>
        </dialog>

        <div class="overflow-x-auto mt-10">
            <table class="table table-zebra">
              <!-- head -->
              <thead>
                <tr>
                  <th>NO</th>
                  <th>NAME</th>
                  <th>EMAIL</th>
                  <th>ROLE</th>
                  <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
                <!-- row 1 -->
                @foreach ($user as $users)
                <tr>
                  <th>{{ $loop->iteration }}</th>
                  <td>{{ $users->name }}</td>
                  <td>{{ $users->email }}</td>
                  <td>{{ $users->role }}</td>
                  <td></td>
                </tr>                  
                @endforeach
              </tbody>
            </table>
          </div>
    </div>

</x-app-layout>