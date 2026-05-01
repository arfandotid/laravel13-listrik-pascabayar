import { Head, Link, usePage } from "@inertiajs/react";
import LayoutApp from "@/Layouts/LayoutApp";
import hasAnyPermission from "@/Utils/Permission";
import { Edit } from "lucide-react";
import PageHeader from "@/Shared/PageHeader";
import TableEmpty from "@/Shared/TableEmpty";
import Search from "@/Shared/Search";
import Delete from "@/Shared/Delete";
import TablePagination from "@/Shared/TablePagination";
import { Button } from "@/Components/ui/button";
import {
    Table,
    TableHeader,
    TableRow,
    TableHead,
    TableBody,
    TableCell,
} from "@/Components/BasicTable";

export default function PembayaranIndex() {
    const { pembayaran } = usePage().props;

    return (
        <>
            <Head title={"Pembayaran"} />
            <LayoutApp>
                <PageHeader
                    showButton
                    title="Pembayaran"
                    description="Kelola data pembayaran"
                    action="/admin/pembayaran/create"
                    actionText="Tambah Pembayaran"
                    permission="pembayaran.create"
                />

                <div className="space-y-5">
                    <Search URL={"/admin/pembayaran"} />

                    <Table>
                        <TableHeader>
                            <TableRow>
                                <TableHead>No.</TableHead>
                                <TableHead>Tagihan id</TableHead>
                                <TableHead>Pelanggan id</TableHead>
                                <TableHead>Tanggal pembayaran</TableHead>
                                <TableHead>Bulan bayar</TableHead>
                                <TableHead>Biaya admin</TableHead>
                                <TableHead>Total bayar</TableHead>
                                <TableHead>User id</TableHead>
                                <TableHead className="w-7">Aksi</TableHead>
                            </TableRow>
                        </TableHeader>
                        <TableBody>
                            {pembayaran && pembayaran.data.length > 0 ? (
                                pembayaran.data.map((item, index) => (
                                    <TableRow key={item.id}>
                                        <TableCell className="font-medium">
                                            {++index +
                                                (pembayaran.current_page - 1) *
                                                    pembayaran.per_page}
                                        </TableCell>
                                        <TableCell>{item.tagihan_id}</TableCell>
                                        <TableCell>
                                            {item.pelanggan_id}
                                        </TableCell>
                                        <TableCell>
                                            {item.tanggal_pembayaran}
                                        </TableCell>
                                        <TableCell>
                                            {item.bulan_bayar}
                                        </TableCell>
                                        <TableCell>
                                            {item.biaya_admin}
                                        </TableCell>
                                        <TableCell>
                                            {item.total_bayar}
                                        </TableCell>
                                        <TableCell>{item.user_id}</TableCell>
                                        <TableCell>
                                            <div className="flex items-center space-x-2">
                                                {hasAnyPermission([
                                                    "pembayaran.edit",
                                                ]) && (
                                                    <Link
                                                        href={`/admin/pembayaran/${item.id}/edit`}
                                                        title="Edit"
                                                    >
                                                        <Button
                                                            size="icon"
                                                            variant="outline"
                                                        >
                                                            <Edit />
                                                        </Button>
                                                    </Link>
                                                )}
                                                {hasAnyPermission([
                                                    "pembayaran.delete",
                                                ]) && (
                                                    <Delete
                                                        URL={
                                                            "/admin/pembayaran"
                                                        }
                                                        id={item.id}
                                                    />
                                                )}
                                            </div>
                                        </TableCell>
                                    </TableRow>
                                ))
                            ) : (
                                <TableEmpty
                                    title="Tidak ada data"
                                    description="Silahkan tambahkan data baru"
                                    colSpan={9}
                                />
                            )}
                        </TableBody>
                    </Table>

                    <TablePagination links={pembayaran.links} />
                </div>
            </LayoutApp>
        </>
    );
}
