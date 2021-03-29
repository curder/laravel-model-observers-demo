<?php
namespace App\Observers;

class PostObserver
{
    // 新增模型数据触发
    public function creating($post)
    {
        echo "creating event is fired\n";
    }

    // 新增模型数据触发
    public function created($post)
    {
        echo "created event is fired\n";
    }

    // 编辑模型数据触发
    public function updating($post)
    {
        echo "updating event is fired\n";
    }

    // 编辑模型数据触发
    public function updated($post)
    {
        echo "updated event is fired\n";
    }

    // 新增、编辑模型数据触发
    public function saving($post)
    {
        echo "saving event is fired\n";
    }

    // 新增、编辑模型数据触发
    public function saved($post)
    {
        echo "saved event is fired\n";
    }

    // 删除模型数据触发
    public function deleting($post)
    {
        echo "deleting event is fired\n";
    }

    // 删除模型数据触发
    public function deleted($post)
    {
        echo "deleted event is fired\n";
    }

    // 监听数据即将从软删除状态恢复的事件。
    public function restoring($post)
    {
        echo "restoring event is fired\n";
    }

    // 监听数据从软删除状态恢复后的事件。
    public function restored($post)
    {
        echo "restored event is fired\n";
    }
}
