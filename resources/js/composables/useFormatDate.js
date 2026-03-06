import { format, parseISO } from "date-fns";

export function useFormatDate() {
    /**
     * Format a date string to "MMM yyyy" format (e.g., "Aug 2016")
     * Handles timezone issues by extracting only the date part
     *
     * @param {string|null} date - ISO date string (YYYY-MM-DD or YYYY-MM-DDTHH:mm:ss.sssZ)
     * @returns {string} Formatted date or empty string
     */
    const formatDate = (date) => {
        if (!date) return "";
        // Extract just the date part (YYYY-MM-DD) to avoid timezone issues
        const dateOnly = date.split("T")[0];
        return format(parseISO(dateOnly), "MMM yyyy");
    };

    return {
        formatDate,
    };
}
