<?php

namespace App\Http\Resources;

use App\Constant\Constants;
use App\Group;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Helper\Helper;
use Illuminate\Database\Eloquent\Builder;

class UserResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'linkedin_profile' => $this->linkedin_profile,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
            'fb_profile' => $this->fb_profile,
            'twitter_profile' => $this->twitter_profile,
            'role_id' => $this->role_id,
            'instagram_profile' => $this->instagram_profile,
            'description' => $this->description,
            'profile_image' => $this->profile_image,
            'state_id' => $this->state_id,
            'media_house' => $this->mediaHouse,
            'journalist_count' => $this->mediaHouseJournalistCount(),
            'ideas_claimed' => $this->userClaimedIdeas(),
            "ideas_published" => $this->userPublishedIdeas(),
            "ideas_count" => ($this->role_id == Constants::TYPE_COMMUNITY_USER) ? $this->ideas->count() : 0,
            'group_ids' => $this->isAdmin() ? Group::pluck('id') : $this->groups->pluck('id'),
            "is_freelancer" => $this->is_freelancer,
            "enable_notification" => $this->enable_notification,
            "isVerify" => (empty($this->email_verification_token) && ($this->state_id == Constants::STATE_ACTIVE)) ? true : false,
            "slug" => $this->slug
        ];
    }
    public static function collection($data)
    {
        /* is_a() makes sure that you don't just match AbstractPaginator
     * instances but also match anything that extends that class.
     */
        if (is_a($data, \Illuminate\Pagination\AbstractPaginator::class)) {
            $data->setCollection(
                $data->getCollection()->map(function ($listing) {
                    return new static($listing);
                })
            );

            return $data;
        }
        return parent::collection($data);
    }
}
