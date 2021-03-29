<?php
namespace Tests\Unit;

use App\Models\Post;
use App\Observers\PostObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class PostsTest
 *
 * @package Tests\Unit
 */
class PostsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_post()
    {
        Post::create(['title' => 'title', 'body' => 'Body']);

        // saving、creating、created、saved
        collect(['saving', 'crating', 'created', 'saved'])
            ->every(fn($action) => $this->assertStringContainsString("${action} event is fired", $this->getActualOutputForAssertion()));
    }

    /** @test */
    public function it_can_destroy_post()
    {
       $post = factory(Post::class)->create();

       Post::destroy($post->id);
       // deleting、deleted
       collect(['deleting', 'deleted'])
           ->every(fn($action) => $this->assertStringContainsString("${action} event is fired", $this->getActualOutputForAssertion()));
    }

    /** @test */
    public function it_can_restore_post()
    {
        $post = factory(Post::class)->create();

        Post::destroy($post->id);

        $post = Post::withTrashed()->latest()->first();

        $post->restore();

        // restoring、saving、updating、updated、saved、restored
        collect(['restoring', 'saving', 'updating', 'updated', 'saved', 'restored'])
            ->every(fn($action) => $this->assertStringContainsString("${action} event is fired", $this->getActualOutputForAssertion()));
    }

    /** @test */
    public function it_can_force_delete_post()
    {
        $post = factory(Post::class)->create();

        $post->forceDelete();

        // deleting、deleted
        collect(['deleting', 'deleted'])
            ->every(fn($action) => $this->assertStringContainsString("${action} event is fired", $this->getActualOutputForAssertion()));
    }

    /** @test */
    public function it_can_update_post()
    {
        $post = factory(Post::class)->create();

        $post->title = 'New Title';
        $post->save();

        // saving、updating、updated、saved
        collect(['saving', 'updating', 'updated', 'saved'])
            ->every(fn($action) => $this->assertStringContainsString("${action} event is fired", $this->getActualOutputForAssertion()));
    }

    /** @test */
    public function it_can_delete_post()
    {
        Post::withoutGlobalScopes();

        $post = factory(Post::class)->create();
        Post::destroy($post->id);

        // deleting、deleted
        collect(['deleting', 'deleted'])
            ->every(fn($action) => $this->assertStringContainsString("${action} event is fired", $this->getActualOutputForAssertion()));
    }
}
