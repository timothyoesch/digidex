<x-app-layout :header="true" :title="__('Users')">
    @if (session("success"))
    <x-alert type="success">
        {{session("success")}}
    </x-alert>
    @endif
    <div class="flex justify-end">
        <x-primary-button>
            <a href="{{route("users.create")}}">{{__("Create User")}}</a>
        </x-primary-button>
    </div>
    <div class="ddx-table mt-6">
        <table>
            <thead>
                <tr>
                    <th scope="col">
                        {{__("Username")}}
                    </th>
                    <th scope="col">
                        {{__("Email Address")}}
                    </th>
                    <th scope="col">
                        {{__("Created At")}}
                    </th>
                    <th scope="col">
                        {{__("Action")}}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="{{($loop->even) ? "even" : "odd"}}">
                    <th scope="row">
                        {{$user->name}}
                    </th>
                    <td>
                        {{$user->email}}
                    </td>
                    <td>
                        {{date("d.m.Y", strtotime($user->created_at))}}
                    </td>
                    <td>
                        <a href="{{route("users.edit", $user)}}">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
