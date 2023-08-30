<div>
    <input wire:model="search" type="text" placeholder="Search users..."/>

    <ul>
        @foreach($kabupatens as $user)
            <li>{{ $user->nama }}</li>
        @endforeach
    </ul>
</div>
