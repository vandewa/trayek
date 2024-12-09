<?php

namespace App\Livewire;

use App\Models\Perusahaan;
use Livewire\Component;
use App\Models\Role;
use App\Models\User as ModelsUser;

class User extends Component
{

    public $role, $listRole, $konfirmasi_password, $idHapus, $edit = false, $user, $perusahaan, $listPerusahaan;

    public $form = [
        'name' => null,
        'email' => null,
        'password' => null,
        'nomor' => null,
        'perusahaan_id' => null,
    ];


    public function mount($id = '')
    {
        if ($id) {
            $user = ModelsUser::find($id)->only(['name', 'email', 'nomor', 'perusahaan_id']);
            $data = ModelsUser::find($id);
            $this->form = $user;
            $this->role = $data->roles()->first()->id;
            $this->edit = true;
            $this->user = $id;
            $this->perusahaan = $data->perusahaan_id;
        }

        $this->listRole = Role::all()->toArray();
        $this->listPerusahaan = Perusahaan::all()->toArray();
    }

    public function ambilRole()
    {
        return Role::all()->toArray();

    }

    public function ambilPerusahaan()
    {
        return Perusahaan::all()->toArray();

    }

    public function save()
    {

        if ($this->edit) {
            $this->storeUpdate();
        } else {
            $this->store();
        }

        $this->js(<<<'JS'
        Swal.fire({
            title: 'Good job!',
            text: 'You clicked the button!',
            icon: 'success',
          })
        JS);

        return redirect(route('master.user-index'));
    }

    public function store()
    {
        $this->validate([
            'konfirmasi_password' => 'required|same:form.password',
            'form.password' => 'required',
            'form.name' => 'required',
            'form.email' => 'required|unique:users,email',
            'role' => 'required',
        ]);

        $this->form['password'] = bcrypt($this->form['password']);
        $this->form['perusahaan_id'] = $this->perusahaan;
        $a = ModelsUser::create($this->form);
        $a->addrole($this->role);
    }

    public function storeUpdate()
    {
        $this->validate([
            'konfirmasi_password' => 'same:form.password',
            'form.name' => 'required',
            'form.email' => 'required|email|unique:users,email,' . $this->user,
            'role' => 'required',
        ]);

        if ($this->form['password'] ?? "") {
            $this->form['password'] = bcrypt($this->form['password']);
        }

        $this->form['perusahaan_id'] = $this->perusahaan;

        ModelsUser::find($this->user)->update($this->form);
        $a = ModelsUser::find($this->user);
        $a->syncRoles([$this->role]);
        $this->reset();
        $this->edit = false;

    }


    public function render()
    {
        return view('livewire.user', [
            'listRole' => $this->ambilRole(),
            'listPerusahaan' => $this->ambilPerusahaan()
        ]);
    }
}
