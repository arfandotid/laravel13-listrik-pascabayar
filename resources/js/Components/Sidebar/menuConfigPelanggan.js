import { FileExclamationPoint, LayoutDashboard, Wallet } from "lucide-react";

export const menuItems = [
    {
        name: "Dashboard",
        icon: LayoutDashboard,
        href: "/dashboard",
    },
    {
        name: "Tagihan",
        icon: FileExclamationPoint,
        href: "/tagihan",
    },
    {
        name: "Riwayat Pembayaran",
        icon: Wallet,
        href: "/pembayaran",
    },
];
