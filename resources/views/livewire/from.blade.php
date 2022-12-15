<div>
  @if(session()->has('msg'))
   <p style="color:green;">{{session('msg')}}</p>
  @endif 
   <table border={1}>
      <thead>
         <th>ID</th>
         <th>Name</th>
         <th>Email</th>
         <th>Roll</th>
         <th>Image</th>
         <th>Action</th>
      </thead>
      <tbody>
      @foreach($students as $student)
      <tr>
         <td>{{ $student['id'] }}</td>
         <td>{{ $student['name'] }}</td>
         <td>{{ $student['email'] }}</td>
         <td>{{ $student['phone'] }}</td>
         <td>
            <img src="{{asset('storage/'.$student->image)}}" alt="" >
         </td>
         <td>
            <button wire:click="edit({{$student['id']}})">Edit</button>
            <button wire:click="delete({{$student['id']}})" >Delete</button>
         </td>

      </tr>
      @endforeach
      </tbody>
   </table>
   
   @if($check == true)
   <form wire:submit.prevent="save" style="text-align:center">
    <input type="text" placeholder ="Enter Name" wire:model="name">
    @error('name') <span>{{$message}}</span> @enderror
    <br></br>
    <input type="email" placeholder ="Enter Email" wire:model="email">
    @error('email') <span>{{$message}}</span> @enderror
    <br></br>
    <input type="number" placeholder ="Enter Roll" wire:model="roll">
    @error('roll') <span>{{$message}}</span> @enderror
    <br></br>
    <input type="password" placeholder ="EnterPassword" wire:model="password">
    @error('password') <span>{{$message}}</span> @enderror
    <br></br>
    <input type="file" wire:model="image">
    @error('password') <span>{{$message}}</span> @enderror
    <br></br>
    <input type="submit" >
    <br></br>
   </form>
   @else
   <form wire:submit.prevent="update" style="text-align:center">
   <input type="text" wire:model="s_id" hidden>
    <input type="text" placeholder ="Enter Name" wire:model="name">
    @error('name') <span>{{$message}}</span> @enderror
    <br></br>
    <input type="email" placeholder ="Enter Email" wire:model="email">
    @error('email') <span>{{$message}}</span> @enderror
    <br></br>
    <input type="number" placeholder ="Enter Roll" wire:model="roll">
    @error('roll') <span>{{$message}}</span> @enderror
    <br></br>
    <input type="password" placeholder ="EnterPassword" wire:model="password">
    @error('password') <span>{{$message}}</span> @enderror
    <br></br>
    <button type="submit" >Update</button>
    <br></br>
   </form>
   @endif
   
</div>
