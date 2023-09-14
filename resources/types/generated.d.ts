declare namespace App.Data {
    export type Column = {
        label: string | null;
        key: string | null;
        type: string | null;
        sortable: boolean;
        sort_key: string | null;
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
        columns: Array<App.Data.Column>;
    };
    export type UserTableData = {
        id: number;
        name: string;
        email: string;
    };
}
