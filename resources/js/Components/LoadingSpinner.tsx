export default function LoadingSpinner({color}:any){
    return (
        <div className=" flex justify-center items-center">
            <div
                className={`animate-spin rounded-full h-[15px] w-[15px] border-2 border-t-transparent ${color ? color : 'border-white '}`}></div>
        </div>

    )
}
