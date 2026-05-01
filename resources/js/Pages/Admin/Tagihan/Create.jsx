import { Head, Link, useForm } from "@inertiajs/react";
import LayoutApp from "@/Layouts/LayoutApp";
import { Save } from "lucide-react";
import PageHeader from "@/Shared/PageHeader";
import { Field, FieldDescription, FieldLabel } from "@/Components/ui/field";
import { Input } from "@/Components/ui/input";
import { Button } from "@/Components/ui/button";
import AppCombobox from "@/Components/AppCombobox";
import { NAMA_BULAN } from "@/constants/nama-bulan";
import {
    Select,
    SelectContent,
    SelectGroup,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from "@/Components/ui/select";

export default function TagihansCreate({ penggunaan }) {
    const { data, setData, post, processing, errors } = useForm({
        penggunaan_id: "",
        status: "",
    });

    const penggunaanOptions = penggunaan.map((item) => ({
        value: item.id,
        label: `${item.pelanggan.nama} - ${NAMA_BULAN[item.bulan]} ${item.tahun}`,
    }));

    const handleSubmit = (e) => {
        e.preventDefault();
        post("/admin/tagihan");
    };

    return (
        <>
            <Head title={"Tambah Tagihan"} />
            <LayoutApp>
                <PageHeader
                    title="Tambah Tagihan"
                    description="Buat data tagihan baru"
                />

                <form onSubmit={handleSubmit}>
                    <div className="grid grid-cols-2 gap-4">
                        <Field>
                            <FieldLabel>Penggunaan</FieldLabel>
                            <AppCombobox
                                items={penggunaanOptions}
                                value={data.penggunaan_id}
                                onChange={(val) =>
                                    setData("penggunaan_id", val)
                                }
                                placeholder="Pilih Penggunaan"
                            />
                            {errors.penggunaan_id && (
                                <FieldDescription className="mt-1 text-sm text-red-600">
                                    {errors.penggunaan_id}
                                </FieldDescription>
                            )}
                        </Field>
                        <Field>
                            <FieldLabel>Status</FieldLabel>
                            <Select
                                value={data.status}
                                onValueChange={(val) => setData("status", val)}
                            >
                                <SelectTrigger>
                                    <SelectValue placeholder="Pilih Status" />
                                </SelectTrigger>
                                <SelectContent>
                                    <SelectGroup>
                                        <SelectItem value="unpaid">
                                            Unpaid
                                        </SelectItem>
                                        <SelectItem value="pending">
                                            Pending
                                        </SelectItem>
                                        <SelectItem value="paid">
                                            Paid
                                        </SelectItem>
                                    </SelectGroup>
                                </SelectContent>
                            </Select>
                            {errors.status && (
                                <FieldDescription className="mt-1 text-sm text-red-600">
                                    {errors.status}
                                </FieldDescription>
                            )}
                        </Field>
                    </div>

                    <div className="flex justify-start space-x-2 pt-6">
                        <Button type="submit" disabled={processing}>
                            <Save />
                            {processing ? "Menyimpan..." : "Simpan"}
                        </Button>
                        <Link href="/admin/tagihan">
                            <Button variant="outline">Batal</Button>
                        </Link>
                    </div>
                </form>
            </LayoutApp>
        </>
    );
}
