declare namespace App.Data {
    export type Column<T> = {
        sort_url: string;
        sort_direction: null | "ASC" | "DESC";
        label: string | null;
        key: keyof T;
        type: string;
        sortable: boolean;
        sort_key: string | null;
    };
    export type DateTimeData = {
        formatted: string;
        value: any;
    };
    export type StatusData = {
        indicator: enabled | disabled;
        label: string;
        value: boolean;
    };
    export type UserIndexViewModel = {
        collection: {
            data: Array<App.Data.UserTableData>;
            links: Array<{
                url: string | null;
                label: string;
                active: boolean;
            }>;
            meta: {
                current_page: number;
                first_page_url: string;
                from: number | null;
                last_page: number;
                last_page_url: string;
                next_page_url: string | null;
                path: string;
                per_page: number;
                prev_page_url: string | null;
                to: number | null;
                total: number;
            };
        };
        columns: Array<App.Data.Column<App.Data.UserTableData>>;
    };
    export type UserTableData = {
        id: number;
        name: string;
        email: string;
        created_at: App.Data.DateTimeData;
        status: App.Data.StatusData;
    };
}
