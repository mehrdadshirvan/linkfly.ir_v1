import IsEmpty from "@/Utils/IsEmpty";

export default function NumberFormat(number?:any){
    if (IsEmpty(number)) return null;
    return number?.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
