export default function ConvertToNormalText(content:any){
    return content?.replace(/<[^>]*>/g, '');
}
