<?php


function AuthRoles() : array {
    if(auth()->check()){
        return auth()->user()->roles->pluck('name')->toArray();
    }
    return [];
}

function AuthPermissions() : array {
    if(auth()->check()){
        return auth()->user()->permissions->pluck('name')->toArray();
    }
    return [];
}


function checkIsSuperAdmin($userID = null): bool
{
    if ($userID != null) {
        $roles = \App\Models\User::query()->where(['id' => $userID])->roles->pluck('id')->toArray();
    } else {
        $roles = auth()->user()->roles->pluck('name')->toArray();
    }
    if (in_array('superAdmin', $roles)) {
        return true;
    }
    return false;
}

function checkAccessAllApply()
{
    $roles = auth()->user()->roles->pluck('name')->toArray();

    if (in_array('superAdmin', $roles)) return true;
    if (in_array('admin', $roles)) return true;
    if (in_array('accounting', $roles)) return true;
    if (in_array('execution', $roles)) return true;
    if (in_array('executionAgent', $roles)) return true;
    if (in_array('executionAgentSkill', $roles)) return true;
    if (in_array('executionAgentStudent', $roles)) return true;
    if (in_array('executionAgentSkillSponsership', $roles)) return true;
    if (in_array('execution188', $roles)) return true;
    if (in_array('executionSponsership', $roles)) return true;

    if (in_array('lawyerAgent', $roles)) return false;
    if (in_array('accountantAgent', $roles)) return false;
    if (in_array('operator', $roles)) return false;
    if (in_array('operatorSkill', $roles)) return false;
    if (in_array('operatorStudent', $roles)) return false;
    if (in_array('operatorSkill&Student', $roles)) return false;
    if (in_array('operatorSponsership', $roles)) return false;

    return false;
}


function findOperatorApplyIDs()
{
    $userId = auth()->user()->id;
    $apply = \App\Models\Apply::query()->where(['operator_id' => $userId])->pluck('id')->toArray();
    return $apply;
}
