<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post as Posts;
class Post extends Component
{ 
    public $search;

    public $posts,$name,$description,$post_id,$post;
    public $updatePost = false;
    protected $listeners = [
        'deletePost'=> 'destroy'
    ];
    protected $rules = [
        'name'=> 'required',
        'description'=> 'required'
    ];

    public function mount(){
        $this->posts = Posts::all();
    }
    public function render()
    {
        // $posts = Posts::query()->latest();
        // if($this->search) {
        //     $this->posts->where('name','like','%'.$this->search.'%')
        //     ->orWhere('description','like','%'.$this->search.'%');
        // }
        // if(! $this->search){
        //     $this->posts = Post::all();
        // }
        // else{
        //     $this->posts = posts::where('name','LIKE','%'.$this->search.'%')->get();
        // }
        $this->posts = Posts::where('name','like','%'.$this->search.'%')->get();
        //$this->posts = posts::select('id','name','description')->get();
        return view('livewire.post', [
            'posts' => $this->posts,
        ]);
    }
    public function resetFields(){
        $this->name='';
        $this->description='';

    }
    public function store(){
        $this->validate();
        try{
             Posts::updateOrCreate(['id' => $this->post_id],[
                'name'=> $this->name,
                'description'=> $this->description
            ]);
            $this->resetFields();
            session()->flash('success','post created successfully');
        }catch(\Exception $e){
            session()->flash('error','Something goes wrong');
            $this->resetFields();
        }
    }
    public function edit($id){
        $post = Posts::findOrFail($id);
        $this->name = $post->name;
        $this->description = $post->description;
        $this->post_id = $post->id;
        $this->updatePost = true;
    }
    public function cancel(){
        $this->updatePost = false;
        $this->resetFields();
    }
    public function delete(Posts $post){

        $post->delete();
       


    }
}
