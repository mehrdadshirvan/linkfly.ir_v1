import {toast} from "react-toastify";

export default function CopyToClipboard(text:string){
    navigator.clipboard.writeText(text);
    //toast.info('کپی شد');
}
