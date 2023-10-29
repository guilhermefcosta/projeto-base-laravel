<?php
 
namespace App\View\Composers;
 
    // use App\Repositories\UserRepository;
use Illuminate\View\View;
 
class ProfileComposer
{

    protected string $titulo;

    /**
     * Create a new profile composer.
     */
    public function __construct(
    ) {
        $this->titulo = 'Cacildes';
    }
 
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        // $view->with('count', $this->users->count());
        $view->with('titulo', $this->titulo);
    }
}