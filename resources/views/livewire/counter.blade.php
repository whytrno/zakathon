<div style="text-align: center">
    <button wire:click="increment">+</button>
    <h1>{{ $count }}</h1>

    <input wire:model="search">
    <h1>{{$search}}</h1>
</div>
