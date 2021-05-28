<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Course;
use App\Models\Review;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function is_enrolled(User $user,Course $course)
    {
        return $course->students->contains($user->id);
    }
    
    public function published(?User $user, Course $course)
    {
        return ($course->status == 3);
    }

    public function dictated(User $user, Course $course)
    {
        return ($course->user_id == $user->id);
    }

    public function revision(User $user, Course $course)
    {
        return ($course->status == 2);
    }

    public function valued(User $user, Course $course)
    {
        if(Review::where("user_id", $user->id)->where("course_id", $course->id)->count())
            return false;

        return true;
    }
}