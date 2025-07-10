



export default function GenerateApplyLabel(backgroundColor?: string, color?: string, label?:string) {
    return <span className={`badge`}
                 style={{
                     backgroundColor: backgroundColor??'#8d8d8d',
                     color: color??'#000',
                 }}
    >
                                                {label??'---'}
                                            </span>
}
