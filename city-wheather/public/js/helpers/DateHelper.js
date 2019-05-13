class DateHelper
{
    static DateFromUTCToBR(timestamp) {
        let date = new Date(timestamp);
        return [date.getDate(), date.getFullYear()].join('/');
    }
}