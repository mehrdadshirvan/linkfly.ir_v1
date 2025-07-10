import {usePage} from "@inertiajs/react";
export default function CheckPermission(check:string) {
    const auth:any = usePage().props.auth;
    if (auth?.roles?.includes('superAdmin')){
        return true;
    }

    return auth?.permissions?.includes(check);
}
