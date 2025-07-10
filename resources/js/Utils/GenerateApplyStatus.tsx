export default function generateApplyStatus(status: string, status_translation: string) {
    if (status == 'in_progress') {
        return <span className="badge badge-primary capitalize">{status_translation}</span>
    } else if (status == 'granted') {
        return <span className="badge badge-success capitalize">{status_translation}</span>
    } else if (status == 'refused') {
        return <span className="badge badge-info capitalize">{status_translation}</span>
    } else if (status == 'pend') {
        return <span className="badge badge-warning capitalize">{status_translation}</span>
    } else if (status == 'rescinded') {
        return <span className="badge badge-danger capitalize">{status_translation}</span>
    }
}
