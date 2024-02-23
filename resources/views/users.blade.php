<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('User') }}
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
              <input name="name">
              <label>email</label>
              <input type="email" name="email">
              <label>password</label>
              <input name="password" type="password">
              <label>role</label>
              <select name="role" id="">
                <option value="admin">Admin</option>
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
                <tr class="text-center">
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
                <tr class="text-center">  
                  <th>{{ $loop->iteration }}</th>
                  <td>{{ $users->name }}</td>
                  <td>{{ $users->email }}</td>
                  <td>{{ $users->role }}</td>
                  <td class="flex justify-center gap-x-1">
                    <label for="modal-2{{ $users->id }}" class="w-8 h-8 rounded bg-[#4318FF] flex items-center justify-center cursor-pointer hover:bg-[#3A16D9]"><img src="{{asset ('assets/edit-icon.svg')}}" alt=""></label>
                    <label for="modal-3{{ $users->id }}" class="w-8 h-8 rounded bg-[#D2000D] flex items-center justify-center cursor-pointer hover:bg-[#B5000B]"><img src="{{asset ('assets/delete-icon.svg')}}" alt=""></label>

                    <input type="checkbox" id="modal-2{{ $users->id }}" class="modal-toggle" />
                    <div class="modal">
                        <div class="modal-box ">
                          <form action="{{ route('users.update', $users->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <label>name</label>
                            <input value="{{ $users->name }}" name="name">
                            <label>email</label>
                            <input value="{{ $users->email }}" type="email" name="email" readonly>
                            <label>password</label>
                            <input name="password" type="password">
                            <label>role</label>
                            <select name="role" id="">
                              <option value="admin">Admin</option>
                              <option value="petugas">Petugas</option>
                            </select>
                            <button type="submit">kirim</button>
                              <div class="modal-action">
                                  <label for="modal-2{{ $users->id }}" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</label>
                              </div>
                          </form>
                        </div>
                    </div>

                    <input type="checkbox" id="modal-3{{ $users->id }}" class="modal-toggle" />
                    <div class="modal">
                        <div class="modal-box ">
                          <form action="{{ route('users.destroy', $users->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <h3 class="font-bold text-lg my-3">Are you sure?</h3>
                            <p>Are you sure to delete <span class="font-bold">{{ $users->name }}</span> from database?</p>
                            <button class="btn w-15 h-8 btn-error text-white mt-5">Yes</button>
                              <div class="modal-action">
                                  <label for="modal-3{{ $users->id }}" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</label>
                              </div>
                          </form>
                        </div>
                    </div>
                  </td>
                </tr>                  
                @endforeach
              </tbody>
            </table>
          </div>
    </div>

</x-app-layout>