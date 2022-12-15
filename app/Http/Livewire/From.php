<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;

class From extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $roll;
    public $password;
    public $image;
    public $s_id;


    public $check = true;

    public $students;

    public function mount()
    {
        $user = new User();
        $this->students = $user::all();
    }

    public function render()
    {
        return view('livewire.from');
    }
    public function updated($field)
    {
        $this->validateOnly($field,[
            'name'=> 'required',
            'email' => 'required|email',
            'roll' => 'required|max:5|min:3',
            'password' => 'required|max:10|min:4',
            'image' => 'required|max:1024'
        ]);
    }
    public function save()
    {
       $user = new User();

       User::insert([
        'name' => $this->name,
        'email' => $this->email,
        'phone' => $this->roll,
        'password' => $this->password,
        'image' => $this->image->store('uploads')
       ]);
       session()->flash('msg','Data have been save fuccessfully');
      $this->resetFilter();
      $this->mount();
    }
    public function resetFilter()
    {
        $this->reset(['name','email','roll','password']);
    }
    public function delete($id)
    {
        User::find($id)->delete();
        $this->mount();
    }
    public function edit($id)
    {
      
       $user =  User::find($id);
       $this->s_id = $user->id;
       $this->name = $user->name;
       $this->email = $user->email;
       $this->roll = $user->phone;
       $this->check =false;
    }
    public function update()
    {
        $user = User::find($this->s_id);

        $user->name = $this->name;
        $user->email = $this->email;
        $user->phone = $this->roll;

        $user->update();
        $this->mount();
        $this->resetFilter();
    }
}
