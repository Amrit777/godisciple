<?php

namespace App\Constant;

class Constants
{

    const FRONTEND_URL = "http://cportal.appsndevs.com/";

    // constant for role
    const TYPE_ADMIN = 1;

    const TYPE_SUB_ADMIN = 2;

    const TYPE_MEDIA_HOUSE = 3;

    const TYPE_JOURNALIST = 4;

    const TYPE_COMMUNITY_USER = 5;

    const IS_JOURNALIST_FREELANCER = 1;

    // constant for Pagination Limit
    const PAGINATION_COUNT = 10;

    const CUSTOM_PAGINATION_COUNT = 50;

    // constant for Collection type

    const COLLECTION_IDEA = 1;

    const COLLECTION_CALLOUT = 2;

    // Admin can change status of User
    const STATE_ACTIVE = 1;

    const STATE_DEACTIVATE = 0;

    const STATE_REJECTED = 2;

    // constant for Idea

    // under review/pending
    const IDEA_PENDING = 0;

    // approved
    const IDEA_APPROVED = 1;

    // published
    const IDEA_PUBLISHED = 2;

    // Rejected
    const IDEA_REJECTED = 3;

    // Draft
    const IDEA_DRAFT = 4;

    // claimed
    const IDEA_CLAIMED = 5;

    // duplicate
    const IDEA_DUPLICATE = 6;

    // if user is inactive - and posts an idea
    const IDEA_INACTIVE = 7;

    // claimed user can change claimed_status

    const CLAIMED_IDEA_STATUS_INVESTIGATE = 1;

    const CLAIMED_IDEA_STATUS_EDIT = 2;

    const CLAIMED_IDEA_STATUS_RESEARCH = 3;

    const CLAIMED_IDEA_STATUS_PUBLISH = 4;

    const UNBLOCK = 0;

    const BLOCKED = 1;

    const NOT_FEATURED = 0;

    const IS_FEATURED = 1;

    const NOT_MERGED = 0;

    const IS_MERGED = 1;

    const COMMENT_IDEA = 1;

    const COMMENT_CALLOUT = 2;

    const CHAT_TYPE_PRIVATE = 1;

    const CHAT_TYPE_GROUP = 2;

    const CHAT_TYPE_INITIATED = 3;

    const INVITE_TYPE_NAME = 1;

    const INVITE_TYPE_MAIL = 2;

    const INVITE_ACCEPTED = 1;

    const INVITE_DECLINED = 2;

    const INVITATION_SENT = 1;

    const INVITATION_RECIEVED = 2;

    const CALLOUT_OPEN = 1;

    const CALLOUT_CLOSED = 2;

    const FUNDING_ACTIVE = 1;

    const FUNDING_CLOSED = 2;

    const IMAGE_ALL = 1;
    const IMAGE_IDEA = 2;
    const IMAGE_CALLOUT = 3;
    const IMAGE_PAGE = 4;

    const PAGE_PENDING_REVIEW = 1;
    const PAGE_PUBLISHED = 2;

    const NOTIFICATION_IS_READ = 1;
    const NOTIFICATION_NOT_READ = 2;

    const NOTIFICATION_IDEA_NEW = 1;
    const NOTIFICATION_IDEA_CLAIMED = 2;
    const NOTIFICATION_IDEA_PUBLISHED = 3;
    const NOTIFICATION_IDEA_UPDATED = 4;
    const NOTIFICATION_IDEA_APPROVED = 5;
    const NOTIFICATION_IDEA_REJECTED = 6;
    const NOTIFICATION_CALLOUT_NEW = 7;
    const NOTIFICATION_USER_SIGNUP = 8;
    const NOTIFICATION_NEW_COMMENTS_IDEA = 9;
    const NOTIFICATION_NEW_COMMENTS_CALLOUT = 10;
    const NOTIFICATION_FOLLOWED_BY_JOURNALIST = 11;
    const NOTIFICATION_FUNDING_NEW = 12;
    const NOTIFICATION_MEDIAHOUSE_ADDED_JOURNALIST = 13;
    const NOTIFICATION_ADMIN_ADDED_JOURNALIST = 14;
    const NOTIFICATION_INVITATION_ACCEPTED = 15;
    const NOTIFICATION_INVITATION_REJECTED = 16;
    const NOTIFICATION_CHAT_NEW = 17;
    const NOTIFICATION_JOURNALIST_INVITED_USER = 18;
    const NOTIFICATION_UNREAD_MESSAGE = 19;
    const NOTIFICATION_IDEA_ASSIGNED_TO_JOURNALIST = 20;
    const NOTIFICATION_CLAIMED_IDEA_STATUS_CHANGED = 21; // noti
    const NOTIFICATION_NEW_IDEA_SUBMIT_NOTIFY_ADMIN = 22; // mails
    const NOTIFICATION_NEW_CALLOUT_SUBMIT_NOTIFY_ADMIN = 23; //mail
    const NOTIFICATION_FUND_REQUEST_SUBMISSION = 24; // mail

    //Backend Pages
    const BANNER_SECTION = 1;
    const HOW_IT_WORKS = 2;
    const THREE_SECTION_PANEL = 3;
    const STATS = 4;
    const MIDDLE_CONTENT = 5;
    const FEATURED_COVERED = 6;

    //Backend Pages status
    const BACKEND_PAGE_PENDING = 0;
    const BACKEND_PAGE_PUBLISHED = 1;
}
