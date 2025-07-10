export default function isEmpty(val:any) {
    return (val === undefined || val == null || val.length <= 0) ? true : false;
}
